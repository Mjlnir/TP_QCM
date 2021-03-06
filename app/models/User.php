<?php
namespace models;
/**
 * @table("name"=>"user")
 */
class User{
	/**
	 * @id()
	 * @column("name"=>"id","dbType"=>"int(11)")
	 * @validator("type"=>"id","constraints"=>["autoinc"=>true])
	 */
	private $id;

	/**
	 * @column("name"=>"password","nullable"=>true,"dbType"=>"varchar(255)")
	 * @validator("type"=>"length","constraints"=>["max"=>255])
	 * @transformer("name"=>"password")
	 */
	private $password;

	/**
	 * @column("name"=>"firstname","nullable"=>true,"dbType"=>"varchar(42)")
	 * @validator("type"=>"length","constraints"=>["max"=>42])
	 */
	private $firstname;

	/**
	 * @column("name"=>"lastname","nullable"=>true,"dbType"=>"varchar(42)")
	 * @validator("type"=>"length","constraints"=>["max"=>42])
	 */
	private $lastname;

	/**
	 * @column("name"=>"email","nullable"=>true,"dbType"=>"varchar(255)")
	 * @validator("type"=>"email")
	 * @validator("type"=>"length","constraints"=>["max"=>255])
	 */
	private $email;

	/**
	 * @column("name"=>"avatar","nullable"=>true,"dbType"=>"varchar(255)")
	 * @validator("type"=>"length","constraints"=>["max"=>255])
	 */
	private $avatar;

	/**
	 * @column("name"=>"language","dbType"=>"varchar(32)")
	 * @validator("type"=>"length","constraints"=>["max"=>32,"notNull"=>true])
	 */
	private $language;

	/**
	 * @column("name"=>"confirmed","nullable"=>true,"dbType"=>"int(11)")
	 */
	private $confirmed;

	/**
	 * @oneToMany("mappedBy"=>"user","className"=>"models\\Group")
	 */
	private $groups;

	/**
	 * @oneToMany("mappedBy"=>"user","className"=>"models\\Message")
	 */
	private $messages;

	/**
	 * @oneToMany("mappedBy"=>"user","className"=>"models\\Message")
	 */
	private $idUsers;

	/**
	 * @oneToMany("mappedBy"=>"user","className"=>"models\\Qcm")
	 */
	private $qcms;

	/**
	 * @oneToMany("mappedBy"=>"user","className"=>"models\\Question")
	 */
	private $questions;

	/**
	 * @oneToMany("mappedBy"=>"user","className"=>"models\\Tag")
	 */
	private $tags;

	/**
	 * @oneToMany("mappedBy"=>"user","className"=>"models\\Useranswer")
	 */
	private $useranswers;

	/**
	 * @oneToMany("mappedBy"=>"user","className"=>"models\\Usergroup")
	 */
	private $usergroups;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password=$password;
	}

	public function getFirstname(){
		return $this->firstname;
	}

	public function setFirstname($firstname){
		$this->firstname=$firstname;
	}

	public function getLastname(){
		return $this->lastname;
	}

	public function setLastname($lastname){
		$this->lastname=$lastname;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email=$email;
	}

	public function getAvatar(){
		return $this->avatar;
	}

	public function setAvatar($avatar){
		$this->avatar=$avatar;
	}

	public function getLanguage(){
		return $this->language;
	}

	public function setLanguage($language){
		$this->language=$language;
	}

	public function getConfirmed(){
		return $this->confirmed;
	}

	public function setConfirmed($confirmed){
		$this->confirmed=$confirmed;
	}

	public function getGroups(){
		return $this->groups;
	}

	public function setGroups($groups){
		$this->groups=$groups;
	}

	 public function addGroup($group){
		$this->groups[]=$group;
	}

	public function getMessages(){
		return $this->messages;
	}

	public function setMessages($messages){
		$this->messages=$messages;
	}

	 public function addMessage($message){
		$this->messages[]=$message;
	}

	public function getIdUsers(){
		return $this->idUsers;
	}

	public function setIdUsers($idUsers){
		$this->idUsers=$idUsers;
	}

	 public function addIdUser($idUser){
		$this->idUsers[]=$idUser;
	}

	public function getQcms(){
		return $this->qcms;
	}

	public function setQcms($qcms){
		$this->qcms=$qcms;
	}

	 public function addQcm($qcm){
		$this->qcms[]=$qcm;
	}

	public function getQuestions(){
		return $this->questions;
	}

	public function setQuestions($questions){
		$this->questions=$questions;
	}

	 public function addQuestion($question){
		$this->questions[]=$question;
	}

	public function getTags(){
		return $this->tags;
	}

	public function setTags($tags){
		$this->tags=$tags;
	}

	 public function addTag($tag){
		$this->tags[]=$tag;
	}

	public function getUseranswers(){
		return $this->useranswers;
	}

	public function setUseranswers($useranswers){
		$this->useranswers=$useranswers;
	}

	 public function addUseranswer($useranswer){
		$this->useranswers[]=$useranswer;
	}

	public function getUsergroups(){
		return $this->usergroups;
	}

	public function setUsergroups($usergroups){
		$this->usergroups=$usergroups;
	}

	 public function addUsergroup($usergroup){
		$this->usergroups[]=$usergroup;
	}

	 public function __toString(){
		return ($this->language??'no value').'';
	}

}