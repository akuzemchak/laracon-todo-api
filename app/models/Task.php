<?php

class Task extends Eloquent
{
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = array('list_id');

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('description', 'completed');

	/**
	 * The date fields for the model.clear
	 *
	 * @var array
	 */
	protected $dates = array('created_at', 'updated_at');

	/**
	 * List relationship.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function tasklist()
	{
		return $this->belongsTo('TaskList', 'list_id');
	}

	/**
	 * Completed mutator.
	 *
	 * @param  mixed  $completed
	 * @return void
	 */
	protected function setCompletedAttribute($completed)
	{
		$value = 0;

		$completed = strtolower($completed);

		if (in_array($completed, array('y', 'yes', '1', 'true', 't')))
		{
			$value = 1;
		}

		$this->attributes['completed'] = $value;
	}

	/**
	 * Completed accessor.
	 *
	 * @return bool
	 */
	protected function getCompletedAttribute($completed)
	{
		return (bool) $completed;
	}

	/**
	 * Validate the model's attributes.
	 *
	 * @return void
	 */
	public function validate()
	{
		$val = Validator::make($this->attributes, array(
			'description' => 'required',
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
		$data['completed'] = $this->completed;
		$data['created_at'] = $this->fromDateTime($this->created_at);
		$data['updated_at'] = $this->fromDateTime($this->updated_at);

		return $data;
	}
}