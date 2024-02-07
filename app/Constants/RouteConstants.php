<?php

namespace App\Constants;

class RouteConstants
{
    const ADMIN_PREFIX = '/me/account';
    // route names
    const HOME = 'home';
    const ADMIN_DASHBOARD = 'admin.dashboard';
    const ADMIN_NODE = 'admin.node';
    const ADMIN_COMMENT = 'admin.comment';
    const ADMIN_UPLOAD = 'admin.upload';
    const ADMIN_TERM = 'admin.term';
    const ADMIN_USER = 'admin.user';
    const ADMIN_OPTION = 'admin.option';


    //page params
    const NODE_TYPE = 'node_type';
    const NODE_ID = 'node_id';
    const NODE_SLUG = 'node_slug';
    const NODE_TYPE_PAGE = 'page';
    const NODE_TYPE_POST = 'post';

    const POST_TAG = 'post_tag';
    const POST_CATEGORY = 'post_category';
}
