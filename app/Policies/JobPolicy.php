<?php

namespace App\Policies;

use App\Job;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
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
		return $user->permissions()->contains('name', 'jobs-viewAny');
	}

	/**
	* Determine whether the user can view the model.
	*
	* @param  User  $user
	* @param  Job  $job
	* @return mixed
	*/
	public function view(User $user, Job $job)
	{
		return $user->permissions()->contains('name', 'jobs-view');
	}

	/**
	* Determine whether the user can create models.
	*
	* @param  User  $user
	* @return mixed
	*/
	public function create(User $user)
	{
		return $user->permissions()->contains('name', 'jobs-create');
	}

	/**
	* Determine whether the user can update the model.
	*
	* @param  User  $user
	* @param  Job  $job
	* @return mixed
	*/
	public function update(User $user, Job $job)
	{
		return $user->permissions()->contains('name', 'jobs-update');
	}

	/**
	* Determine whether the user can delete the model.
	*
	* @param  User  $user
	* @param  Job  $job
	* @return mixed
	*/
	public function delete(User $user, Job $job)
	{
		return $user->permissions()->contains('name', 'jobs-delete');
	}
}
