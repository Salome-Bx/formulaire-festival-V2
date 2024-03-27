<?php

namespace src\Models;

use src\Services\Hydratation;

class User
{
  private int $Id_User;
  private string $lastName;
  private string $firstName;
  private string $password;
  private string $address;
  private int $telephone;
  private bool $User_Role;
  private string $mail;


  use Hydratation;


  /**
   * Get the value of Id_User
   */
  public function getIdUser(): int
  {
    return $this->Id_User;
  }

  /**
   * Set the value of Id_User
   */
  public function setIdUser(int $Id_User): self
  {
    $this->Id_User = $Id_User;

    return $this;
  }

  /**
   * Get the value of lastName
   */
  public function getLastName(): string
  {
    return $this->lastName;
  }

  /**
   * Set the value of lastName
   */
  public function setLastName(string $lastName): self
  {
    $this->lastName = $lastName;

    return $this;
  }

  /**
   * Get the value of firstName
   */
  public function getFirstName(): string
  {
    return $this->firstName;
  }

  /**
   * Set the value of firstName
   */
  public function setFirstName(string $firstName): self
  {
    $this->firstName = $firstName;

    return $this;
  }

  /**
   * Get the value of password
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * Set the value of password
   */
  public function setPassword(string $password): self
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of address
   */
  public function getAddress(): string
  {
    return $this->address;
  }

  /**
   * Set the value of address
   */
  public function setAddress(string $address): self
  {
    $this->address = $address;

    return $this;
  }

  /**
   * Get the value of telephone
   */
  public function getTelephone(): int
  {
    return $this->telephone;
  }

  /**
   * Set the value of telephone
   */
  public function setTelephone(int $telephone): self
  {
    $this->telephone = $telephone;

    return $this;
  }

  /**
   * Get the value of User_Role
   */
  public function isUserRole(): bool
  {
    return $this->User_Role;
  }

  /**
   * Set the value of User_Role
   */
  public function setUserRole(bool $User_Role): self
  {
    $this->User_Role = $User_Role;

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
