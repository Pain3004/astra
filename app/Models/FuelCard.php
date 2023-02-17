<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract; 
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Auth;

class FuelCard extends Model 
{
    use Notifiable, Authenticatable;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $connection = 'mongodb';
    protected $collection = 'ifta_card_category';
    protected $guarded = [];
    protected $primarykey = "_id";
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'userPass',
    // ];
    // public function getAuthPassword()
    // {
    //     return $this->userPassword;
    // }
     public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    /**
     * @param mixed $cardHolderName
     */
    public function setCardHolderName($cardHolderName)
    {
        $this->cardHolderName = $cardHolderName;
    }
    public function deleteIftaCard($i_card,$companyID) {
        
        $data=Model::update(['companyID' => $companyID,'ifta_card._id' => (int)$i_card->getId()], 
            ['$set' => ['ifta_card.$.deleteStatus' => 'YES','ifta_card.$.deleteUser' => Auth::user()->userName,'ifta_card.$.deleteTime' => time()]]
        );
        // dd($data);
    }
    // public function drive()
    // {
    //     return $this->hasOne('App\Userlist', 'user', '_id');
    // }
    public function ifta_card_category(){
        return $this->belongsTo('driver');
    }
   
}
