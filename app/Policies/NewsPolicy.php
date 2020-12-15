<?php

namespace App\Policies;

use App\News;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
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
		return $user->permissions()->contains('name', 'news-viewAny');
	}

	/**
	* Determine whether the user can view the model.
	*
	* @param  User  $user
	* @param  News  $news
	* @return mixed
	*/
	public function view(User $user, News $news)
	{
		return $user->permissions()->contains('name', 'news-view');
	}

	/**
	* Determine whether the user can create models.
	*
	* @param  User  $user
	* @return mixed
	*/
	public function create(User $user)
	{
		return $user->permissions()->contains('name', 'news-create');
	}

	/**
	* Determine whether the user can update the model.
	*
	* @param  User  $user
	* @param  News  $news
	* @return mixed
	*/
	public function update(User $user, News $news)
	{
		return $user->permissions()->contains('name', 'news-update');
	}

	/**
	* Determine whether the user can delete the model.
	*
	* @param  User  $user
	* @param  News  $news
	* @return mixed
	*/
	public function delete(User $user, News $news)
	{
		return $user->permissions()->contains('name', 'news-delete');
	}
}
