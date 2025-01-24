<?php

namespace App\Entity;



class Article extends Entity
{
    protected ?int $id = null;
    protected ?string $title = '';
    protected ?string $description = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getdescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }


    /*
        Pourrait être déplacé dans une classe UserValidator
    */
    public function validate(): array
    {
        $errors = [];
        if (empty($this->getTitle())) {
            $errors['title'] = 'Le champ prénom ne doit pas être vide';
        }
        if (empty($this->getdescription())) {
            $errors['email'] = 'Le champ email ne doit pas être vide';
        }
        return $errors;
    }
}
