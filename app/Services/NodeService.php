<?php

namespace App\Services;

use App\Constants\RouteConstants;
use App\Models\Node;
use Illuminate\Http\Request;

class NodeService
{
    public function createNode(Request $request, $nodeType)
    {
        //check if authenticated
        if (!$request->user()) {
            return redirect()->route(RouteConstants::HOME);
        }
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'categories' => 'nullable|array|exists:terms,id',
            'tags' => 'nullable|array|exists:terms,id',
            'status' => 'required|in:published,draft,private',
            'comment_status' => 'required|in:open,closed',
            'excerpt' => 'nullable|string|max:255',
        ]);

        $node = new Node();
        $node->owner_id = $request->user()->id;
        $node->title = $request->get('title');
        $node->body = $request->get('body');
        $node->status = $request->get('status');
        $node->comment_status = $request->get('comment_status');
        $node->excerpt = $request->get('excerpt');

        $node->type = $nodeType;
        $node->save();

        $node->terms()->attach(array_merge($request->get('categories', []), $request->get('tags', [])));

        return redirect()->route(RouteConstants::ADMIN_NODE, [RouteConstants::NODE_TYPE => $nodeType])->with('success', 'Node created successfully');
    }

    public function deleteNode(Request $request)
    {
        //check if authenticated
        if (!$request->user()) {
            return redirect()->route(RouteConstants::HOME);
        }
        $nodeId = $request->get(RouteConstants::NODE_ID);
        $node = Node::find($nodeId);
        $nodeType = $node->type;
        if ($node) {
            $node->delete();
        }
        return redirect()->route(RouteConstants::ADMIN_NODE, [RouteConstants::NODE_TYPE => $nodeType]);
    }

    public function updateNode(Request $request, Node $node)
    {
        //check if authenticated
        if (!$request->user()) {
            return redirect()->route(RouteConstants::HOME);
        }
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'nullable',
            'categories' => 'nullable|array|exists:terms,id',
            'tags' => 'nullable|array|exists:terms,id',
            'status' => 'required|in:published,draft,private',
            'comment_status' => 'required|in:open,closed',
            'excerpt' => 'nullable|string|max:255',
        ]);

        $node->update([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'status' => $request->get('status'),
            'comment_status' => $request->get('comment_status'),
            'excerpt' => $request->get('excerpt'),

        ]);

        $node->terms()->sync(array_merge($request->get('categories', []), $request->get('tags', [])));

        return redirect()->route(RouteConstants::ADMIN_NODE . '.edit', ['node' => $node])->with('success', 'Node updated successfully');
    }
}
