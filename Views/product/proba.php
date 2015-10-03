<?php /** @var |MVC\Areas\ViewModels\ProductModel[] $model */?>

<?php

\MVC\ViewHelpers\RadioAndCheckButtons::create()
    ->addAttribute('type','radio')
    ->addAttribute('name', 'proba')
    ->addAttribute('value', 'proba')
    ->addAttribute('checked','')
    ->setContent('Proba')
    ->render();
\MVC\ViewHelpers\RadioAndCheckButtons::create()
    ->addAttribute('type','radio')
    ->addAttribute('name', 'proba')
    ->addAttribute('value', 'second')
    ->setContent('Second')
    ->render();

\MVC\ViewHelpers\RadioAndCheckButtons::create()
    ->addAttribute('type','checkbox')
    ->addAttribute('name', 'proba')
    ->addAttribute('value', 'proba')
    ->setContent('Proba')
    ->render();
\MVC\ViewHelpers\RadioAndCheckButtons::create()
    ->addAttribute('type','checkbox')
    ->addAttribute('name', 'proba')
    ->addAttribute('value', 'second')
    ->addAttribute('checked','')
    ->setContent('Second')
    ->render();

\MVC\ViewHelpers\TextAndPasswordFields::create()
    ->addAttribute('type','text')
    ->addAttribute('name', 'proba')
    ->addAttribute('placeholder', 'second')
    ->setContent('Text Field')
    ->render();

\MVC\ViewHelpers\TextAndPasswordFields::create()
    ->addAttribute('type','password')
    ->addAttribute('name', 'proba')
    ->addAttribute('placeholder', 'password')
    ->setContent('Password Field')
    ->render();
\MVC\ViewHelpers\TextArea::create()
    ->addAttribute('rows','4')
    ->addAttribute('cols', '50')
    ->setContent('Textarea Field')
    ->render();

