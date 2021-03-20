<h1 align="center"> 
<br>
    <img src="https://github.com/medunes/gof-php/blob/master/logo.png" width="200">
</h1>

<h5>A GoF playbook in PHP</h5>

[![Build Status](https://github.com/medunes/gof-php/workflows/build/badge.svg?style=flat-square)](https://github.com/MedUnes/gof-php/actions?query=workflow%3A%22build%22)
[![Author](https://img.shields.io/badge/author-@medunes-blue.svg?style=flat-square)](https://twitter.com/medunes2)
[![PHPStan](https://img.shields.io/badge/PHPStan-Level%205-brightgreen.svg?style=flat&logo=php)](https://shields.io/#/)
[![Psalm](https://img.shields.io/badge/Psalm-Level%205-brightgreen.svg?style=flat&logo=php)](https://shields.io/#/)

<br>

## ℹ️ So what is this?

A [GoF](https://www.amazon.de/Patterns-Elements-Reusable-Object-Oriented-Software/dp/0201633612/) playbook in PHP


## ℹ️ Some Learnings/quotes from the book

* The point of learning design patterns is to prime your toolkit with solution ideas,
  not to follow dogma when solving problems for a test.
* There's rarely a perfect choice in real-world scenarios. You have to balance trade-offs and decide what approach is best for the situation at hand.
* Strategy pattern and Visitor Pattern: two sides of the same coin?
> OOP are made up of objects. An object packages both data and the procedures that operate on that data.
> The procedures are typically called methods or operations.
> An object performs an operation when it receives a request (or message) from a client.

> Requests are the only way to get an object to execute an operation.
> Operations are the only way to change an object's internal data.
> Because of these restrictions, the only way to change an object's internal state is said to be encapsulated;
> it cannot be accessed directly

> Program to an interface, not to an implementation
* The latter should be delegated to creation design patterns.

> "Inheritance breaks encapsulation" - Alan Snyder (1986)

> Favoring object composition over class inheritance helps you keep each class encapsulated and focused on the task

* Seems like Delegation as explained in GoF is the basis of the Interface Segregation in SOLID, right ?

> In general, the runtime structures aren't clear from the code until you understand the patterns

> If applications are hard to design, and toolkits [packages] are harder, then frameworks are hardest of all

* Abstract Factories: On demand generic interacting **families** of interfaces!

#### Where to contribute?

[CONTRIBUTING](https://github.com/medunes/gof-php/blob/master/CONTRIBUTING.md)

