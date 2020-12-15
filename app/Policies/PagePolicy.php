<?php

namespace App\Policies;

use App\Page;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

	/**
	* Determine whether the user can view any models.
	*
	* @param  User  $user
	* @return mixed
	*/
	public function viewAny(User $user)
	{
		return $user->permissions()->contains('name', 'pages-viewAny');
	}

	/**
	* Determine whether the user can view the model.
	*
	* @param  User  $user
	* @param  Page  $page
	* @return mixed
	*/
	public function view(User $user, Page $page)
	{
		return $user->permissions()->contains('name', 'pages-view');
	}

	/**
	* Determine whether the user can create models.
	*
	* @param  User  $user
	* @return mixed
	*/
	public function create(User $user)
	{
		return $user->permissions()->contains('name', 'pages-create');
	}

	/**
	* Determine whether the user can update the model.
	*
	* @param  User  $user
	* @param  Page  $page
	* @return mixed
	*/
	public function update(User $user, Page $page)
	{
		return $user->permissions()->contains('name', 'pages-update');
	}

	/**
	* Determine whether the user can delete the model.
	*
	* @param  User  $user
	* @param  Page  $page
	* @return mixed
	*/
	public function delete(User $user, Page $page)
	{
		return $user->permissions()->contains('name', 'pages-delete');
	}
}
