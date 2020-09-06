type Pages = 'home'
           | 'about'
           | 'interests'
           | 'learning'
           | 'photos'
           | 'contact'
           | 'test'
           | 'history'
           | 'guest-book';

type PageHistory = {[key in Pages]: number;};

export const visitPage = (page: Pages) => {
    incrementLocalStoragePageVisits(page);
    incrementSessionStoragePageVisits(page);
};

const incrementLocalStoragePageVisits = (page: Pages) => {
    const currentLocalStorageValue = getLocalStorageValue(page);
    if (currentLocalStorageValue) {
        setLocalStorageValue(page, (Number(currentLocalStorageValue) + 1).toString());
    } else {
        setLocalStorageValue(page, '1');
    }
};

const incrementSessionStoragePageVisits = (page: Pages) => {
    const currentSessionStorageValue = getSessionStorageValue(page);
    if (currentSessionStorageValue) {
        setSessionStorageValue(page, (Number(currentSessionStorageValue) + 1).toString());
    } else {
        setSessionStorageValue(page, '1');
    }
};

export const getGlobalHistory = (): PageHistory => {
    return {
        home: Number(getLocalStorageValue('home')),
        about: Number(getLocalStorageValue('about')),
        interests: Number(getLocalStorageValue('interests')),
        learning: Number(getLocalStorageValue('learning')),
        photos: Number(getLocalStorageValue('photos')),
        contact: Number(getLocalStorageValue('contact')),
        test: Number(getLocalStorageValue('test')),
        history: Number(getLocalStorageValue('history')),
        "guest-book": Number(getLocalStorageValue('guest-book'))
    };
};

export const getSessionHistory = (): PageHistory => {
    return {
        home: Number(getSessionStorageValue('home')),
        about: Number(getSessionStorageValue('about')),
        interests: Number(getSessionStorageValue('interests')),
        learning: Number(getSessionStorageValue('learning')),
        photos: Number(getSessionStorageValue('photos')),
        contact: Number(getSessionStorageValue('contact')),
        test: Number(getSessionStorageValue('test')),
        history: Number(getSessionStorageValue('history')),
        "guest-book": Number(getSessionStorageValue('guest-book'))
    };
};

export const getLocalStorageValue = (name: string) => {
    return localStorage.getItem(name);
};

export const setLocalStorageValue = (name: string, value: string) => {
    localStorage.setItem(name, value);
};

export const getSessionStorageValue = (name: string) => {
    return sessionStorage.getItem(name);
};

export const setSessionStorageValue = (name: string, value: string) => {
    sessionStorage.setItem(name, value);
};