<?php

namespace App\Policies;

use App\Advertisement;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertisementPolicy
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
		return $user->permissions()->contains('name', 'advertisements-viewAny');
	}

	/**
	* Determine whether the user can view the model.
	*
	* @param  User  $user
	* @param  Advertisement  $advertisement
	* @return mixed
	*/
	public function view(User $user, Advertisement $advertisement)
	{
		return $user->permissions()->contains('name', 'advertisements-view');
	}

	/**
	* Determine whether the user can create models.
	*
	* @param  User  $user
	* @return mixed
	*/
	public function create(User $user)
	{
		return $user->permissions()->contains('name', 'advertisements-create');
	}

	/**
	* Determine whether the user can update the model.
	*
	* @param  User  $user
	* @param  Advertisement  $advertisement
	* @return mixed
	*/
	public function update(User $user, Advertisement $advertisement)
	{
		return $user->permissions()->contains('name', 'advertisements-update');
	}

	/**
	* Determine whether the user can delete the model.
	*
	* @param  User  $user
	* @param  Advertisement  $advertisement
	* @return mixed
	*/
	public function delete(User $user, Advertisement $advertisement)
	{
		return $user->permissions()->contains('name', 'advertisements-delete');
	}
}
