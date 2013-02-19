<?php

use Illuminate\Auth\UserInterface;

class TaskList extends Eloquent
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'lists';

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = array('user_id');

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('name');

	/**
	 * The date fields for the model.clear
	 *
	 * @var array
	 */
	protected $dates = array('created_at', 'updated_at');

	/**
	 * User relationship.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * Tasks relationship.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function tasks()
	{
		return $this->hasMany('Task', 'list_id');
	}

	/**
	 * Find a list by ID, and verify its ownership by the given user
	 *
	 * @param  Illuminate\Auth\UserInterface|int  $owner
	 * @param  int  $id
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public static function findByOwnerAndId($owner, $id)
	{
		if (!is_numeric($owner) && !($owner instanceof UserInterface))
		{
			throw new InvalidArgumentException('Owner must be either a numeric ID or an instance of UserInterface');
		}

		$list = static::find($id);

		if (!$list)
		{
			throw new NotFoundException('List was not found');
		}

		$owner_id = ($owner instanceof UserInterface) ? (int) $owner->id : (int) $owner;

		if ((int) $list->user_id !== $owner_id)
		{
			throw new PermissionException('Insufficient access privileges for this list');
		}

		return $list;
	}

	/**
	 * Validate the model's attributes.
	 *
	 * @return void
	 */
	public function validate()
	{
		$val = Validator::make($this->attributes, array(
			'name' => 'required',
		));

		if ($val->fails())
		{
			throw new ValidationException($val);
		}
	}

	/**
	 * Convert the model instance to an array.
	 *
	 * @return array
	 */
	public function toArray()
	{
		$data = parent::toArray();

		$data['id'] = (int) $data['id'];
		$data['created_at'] = $this->fromDateTime($this->created_at);
		$data['updated_at'] = $this->fromDateTime($this->updated_at);

		return $data;
	}
}