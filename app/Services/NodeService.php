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
            'name' => 'required|max:255',
            'body' => 'required',
        ]);

        $node = new Node();
        $node->owner_id = $request->user()->id;
        $node->name = $request->get('name');
        $node->body = $request->get('body');

        $node->type = $nodeType;
        $node->save();

        return redirect()->route(RouteConstants::ADMIN_NODE, [RouteConstants::NODE_TYPE => $nodeType]);
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
}
