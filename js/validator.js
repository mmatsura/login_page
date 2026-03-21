export const validator = {
    validateEmail: (email) => {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }, 

    isPasswordValid: (password) => {
        return password.length >= 6;
    },

    hasNumber: (password) => {
        return /\d/.test(password);
    }, 

    doesNotContainSpaces: (password) => {
        return !/\s/.test(password);
    }, 

    doesNotContainSpecialChars: (password) => { 
        return !/[!@#$%^&*(),.?":{}|<>]/.test(password);
    }, 

    doPasswordMatch: (password, confirmPassword) => {
        return password === confirmPassword;
    }, 

    formIsValid: (email, password, confirmPassword) => {
        return validator.validateEmail(email) &&
            validator.isPasswordValid(password) &&
            validator.hasNumber(password) &&
            validator.doesNotContainSpaces(password) &&
            validator.doesNotContainSpecialChars(password) &&
            validator.doPasswordMatch(password, confirmPassword);
    }
}