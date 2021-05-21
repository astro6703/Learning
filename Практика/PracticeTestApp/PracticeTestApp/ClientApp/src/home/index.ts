import * as ko from 'knockout';

interface Person {
    name: string;
    age: number;
}

class IndexViewModel {
    public person: KnockoutObservable<Person>;

    constructor() {
        const person = { name: 'Dude', age: 25 };
        this.person = ko.observable(person);
    }
}

ko.applyBindings(new IndexViewModel());