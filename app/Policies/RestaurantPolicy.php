<?php

namespace App\Policies;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RestaurantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any restaurants.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the restaurant.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Restaurant  $restaurant
     * @return mixed
     */
    public function view(User $user, Restaurant $restaurant)
    {
        return $user->id === $restaurant->user_id;
    }

    /**
     * Determine whether the user can create restaurants.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the restaurant.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Restaurant  $restaurant
     * @return mixed
     */
    public function update(User $user, Restaurant $restaurant)
    {
        return $user->id === $restaurant->user_id;
    }

    /**
     * Determine whether the user can delete the restaurant.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Restaurant  $restaurant
     * @return mixed
     */
    public function delete(User $user, Restaurant $restaurant)
    {
        return $user->id === $restaurant->user_id;
    }
}
