<?php

namespace App\Policies;

use App\Order;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
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
		return $user->permissions()->contains('name', 'orders-viewAny');
	}

	/**
	* Determine whether the user can view the model.
	*
	* @param  User  $user
	* @param  Order  $order
	* @return mixed
	*/
	public function view(User $user, Order $order)
	{
		return $user->permissions()->contains('name', 'orders-view');
	}

	/**
	* Determine whether the user can create models.
	*
	* @param  User  $user
	* @return mixed
	*/
	public function create(User $user)
	{
		return $user->permissions()->contains('name', 'orders-create');
	}

	/**
	* Determine whether the user can update the model.
	*
	* @param  User  $user
	* @param  Order  $order
	* @return mixed
	*/
	public function update(User $user, Order $order)
	{
		return $user->permissions()->contains('name', 'orders-update');
	}

	/**
	* Determine whether the user can delete the model.
	*
	* @param  User  $user
	* @param  Order  $order
	* @return mixed
	*/
	public function delete(User $user, Order $order)
	{
		return $user->permissions()->contains('name', 'orders-delete');
	}
}
