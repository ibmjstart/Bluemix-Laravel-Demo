<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;
use App\Models\FollowEvent;
use App\Models\Board;
use App\Models\Post;
use Psy\ExecutionLoop\ForkingLoop;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, AuthorizableContract
     {
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     use Authenticatable, Authorizable, CanResetPassword;
    protected $fillable = ['name', 'email','fbid','account'];
    protected $primaryKey = 'user_id';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    /*
    */
    public function boards()
    {
        return $this->hasMany('App\Models\Board');
    }
    //lưu thông tin người sử dụng vào db
    public static function CreateUser($response){
        $user = new User();
        $user->fb_id = $response['id'];
        $user->name = $response['name'];
        $user->gender = $response['gender'];
        $user->birthday = $response['birthday'];
        $user->save();
        return $user;
    }

    //kiểm tra người dùng có tồn tại hay không theo fb_id
    public static function CheckUser($fb_id){
        $result = User::where('fb_id', $fb_id)->first();

        if($result){
            return $result;
        }else{
            return false;
        }
    }
    public static function getUserByName($user_name)
    {
        $result = User::where('username',$user_name)->first();
        return $result;
    }
    public static function getUserById($user_id)
    {
        $result = User::where('user_id',$user_id)->first();
        return $result;
    }
    public static function getProfile($user_id){
        $number_of_following = FollowEvent::countFollowing($user_id);
        $number_of_follower = FollowEvent::countFollower($user_id);
        $number_of_boards = Board::countBoardsByUserId($user_id);
        $number_of_posts = Post::countPostsByUserId($user_id);
        return array(
            "number_of_posts"=>$number_of_posts,
            "number_of_boards"=>$number_of_boards,
            "number_of_follower"=>$number_of_follower,
            "number_of_following"=>$number_of_following
        );
    }
}
