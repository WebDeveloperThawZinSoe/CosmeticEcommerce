<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Spatie\Permission\Models\Role;
use App\Models\CustomerType;
use App\Models\Type;

class SocialAuthController extends Controller
{
    // Redirect to the provider (e.g., Google)
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Handle the provider callback
    public function handleProviderCallback($provider)
    {
        try {
            // Retrieve user information from provider
            $socialUser = Socialite::driver($provider)->user();

            // Find or create user based on provider information
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName(),
                    'provider_id' => $socialUser->getId(),
                    'provider_name' => $provider,
                    'password' => Hash::make(uniqid()), // Fallback password
                ]
            );

            // Apply additional role and type assignment if the user was newly created
            if ($user->wasRecentlyCreated) {
                $this->assignRoleAndType($user);
            }

            // Log the user in
            Auth::login($user);

            return redirect('/dashboard'); // Redirect to intended page
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Unable to login using ' . ucfirst($provider));
        }
    }

    // Assign default role and customer type
    protected function assignRoleAndType(User $user)
    {
        // Assign a default role
        $role = Role::where('name', 'Customer')->first();
        if ($role) {
            $user->assignRole($role);
        }

        // Assign default customer type based on the smallest discount
        $type = Type::orderBy("discount_amount", "asc")->first();
        CustomerType::create([
            "user_id" => $user->id,
            "type_id" => $type->id
        ]);
    }
}
