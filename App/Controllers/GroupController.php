<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Class GroupController
 * Handles actions related to photo groups.
 *
 * @package App\Controllers
 */
class GroupController extends BaseController
{
    /**
     * Authorizes controller actions based on the specified action name.
     *
     * In this implementation, all actions are authorized unconditionally.
     *
     * @param string $action The action name to authorize.
     * @return bool Returns true, allowing all actions.
     */
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    /**
     * Displays the group detail page with the photo gallery.
     *
     * @return Response The response object containing the rendered HTML for the group page.
     */
    public function index(Request $request): Response
    {
        return $this->html();
    }
}
