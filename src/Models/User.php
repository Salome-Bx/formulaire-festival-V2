<?php

namespace src\Models;

use src\Services\Hydratation;

class User
{
  private int $_Id_User;
  private string $_lastName;
  private string $_firstName;
  private string $_password;
  private string $_address;
  private int $_telephone;
  private bool $_User_Role;
  private string $mail;


  use Hydratation;







  /**
   * Get the value of _Id_User
   */
  public function getIdUser(): int
  {
    return $this->_Id_User;
  }

  /**
   * Set the value of _Id_User
   */
  public function setIdUser(int $_Id_User): self
  {
    $this->_Id_User = $_Id_User;

    return $this;
  }

  /**
   * Get the value of _lastName
   */
  public function getLastName(): string
  {
    return $this->_lastName;
  }

  /**
   * Set the value of _lastName
   */
  public function setLastName(string $_lastName): self
  {
    $this->_lastName = $_lastName;

    return $this;
  }

  /**
   * Get the value of _firstName
   */
  public function getFirstName(): string
  {
    return $this->_firstName;
  }

  /**
   * Set the value of _firstName
   */
  public function setFirstName(string $_firstName): self
  {
    $this->_firstName = $_firstName;

    return $this;
  }

  /**
   * Get the value of _password
   */
  public function getPassword(): string
  {
    return $this->_password;
  }

  /**
   * Set the value of _password
   */
  public function setPassword(string $_password): self
  {
    $this->_password = $_password;

    return $this;
  }

  /**
   * Get the value of _address
   */
  public function getAddress(): string
  {
    return $this->_address;
  }

  /**
   * Set the value of _address
   */
  public function setAddress(string $_address): self
  {
    $this->_address = $_address;

    return $this;
  }

  /**
   * Get the value of _telephone
   */
  public function getTelephone(): int
  {
    return $this->_telephone;
  }

  /**
   * Set the value of _telephone
   */
  public function setTelephone(int $_telephone): self
  {
    $this->_telephone = $_telephone;

    return $this;
  }

  /**
   * Get the value of _User_Role
   */
  public function isUserRole(): bool
  {
    return $this->_User_Role;
  }

  /**
   * Set the value of _User_Role
   */
  public function setUserRole(bool $_User_Role): self
  {
    $this->_User_Role = $_User_Role;

    return $this;
  }

  /**
   * Get the value of mail
   */
  public function getMail(): string
  {
    return $this->mail;
  }

  /**
   * Set the value of mail
   */
  public function setMail(string $mail): self
  {
    $this->mail = $mail;

    return $this;
  }
}
