<?php

namespace App\Policies\Admin;

use App\User;
use App\Page;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagesPolicy
{
    use HandlesAuthorization;

    public function admin(User $user)
    {
        if ($user->isAdmin) {
            return true;
        }
    }

    public function all(User $user)
    {
        if ($user->isAdmin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the page.
     *
     * @param  \App\User $user
     * @param  \App\Page $page
     * @return mixed
     */
    public function view(User $user, Page $page)
    {
        if ($page->posted) {
            return true;
        }
    }

    /**
     * Determine whether the user can create pages.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        if ($user->isAdmin) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the page.
     *
     * @param  \App\User $user
     * @param  \App\Page $page
     * @return mixed
     */
    public function update(User $user, Page $page)
    {
        //
        if ($user->isAdmin) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @param  \App\User $user
     * @param  \App\Page $page
     * @return mixed
     */
    public function delete(User $user, Page $page)
    {
        //
        if ($user->isAdmin) {
            return true;
        }
    }

    public function before($user, $ability)
    {
        if ($user->isAdmin) {
            return true;
        }
    }
}
