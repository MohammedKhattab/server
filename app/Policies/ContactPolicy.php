<?php

namespace App\Policies;

use App\Contact;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
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
		return $user->permissions()->contains('name', 'contacts-viewAny');
	}

	/**
	* Determine whether the user can view the model.
	*
	* @param  User  $user
	* @param  Contact  $contact
	* @return mixed
	*/
	public function view(User $user, Contact $contact)
	{
		return $user->permissions()->contains('name', 'contacts-view');
	}

	/**
	* Determine whether the user can create models.
	*
	* @param  User  $user
	* @return mixed
	*/
	public function create(User $user)
	{
		return $user->permissions()->contains('name', 'contacts-create');
	}

	/**
	* Determine whether the user can update the model.
	*
	* @param  User  $user
	* @param  Contact  $contact
	* @return mixed
	*/
	public function update(User $user, Contact $contact)
	{
		return $user->permissions()->contains('name', 'contacts-update');
	}

	/**
	* Determine whether the user can delete the model.
	*
	* @param  User  $user
	* @param  Contact  $contact
	* @return mixed
	*/
	public function delete(User $user, Contact $contact)
	{
		return $user->permissions()->contains('name', 'contacts-delete');
	}
}
