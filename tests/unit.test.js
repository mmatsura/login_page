import {expect, test, describe} from 'vitest';
import { validator } from '../js/validator.js';

describe("Unit tests for validator functions", () => {
    test("validateEmail should return true for valid email", () => {
        expect(validator.validateEmail("test@example.com")).toBe(true);
    });
    test("validateEmail should return false for invalid email", () => {
        expect(validator.validateEmail("invalid-email")).toBe(false);
    });
    test("isPasswordValid should return true for valid password", () => {
        expect(validator.isPasswordValid("password123")).toBe(true);
    });
    test("isPasswordValid should return false for invalid password", () => {
        expect(validator.isPasswordValid("short")).toBe(false);
    });
    test("hasNumber should return true for password with number", () => {
        expect(validator.hasNumber("password123")).toBe(true);
    });
    test("hasNumber should return false for password without number", () => {
        expect(validator.hasNumber("password")).toBe(false);
    });
    test("doesNotContainSpaces should return true for password without spaces", () => {
        expect(validator.doesNotContainSpaces("password123")).toBe(true);
    });
    test("doesNotContainSpaces should return false for password with spaces", () => {
        expect(validator.doesNotContainSpaces("password 123")).toBe(false);
    });
    test("doesNotContainSpecialChars should return true for password without special characters", () => {
        expect(validator.doesNotContainSpecialChars("password123")).toBe(true);
    });
    test("doesNotContainSpecialChars should return false for password with special characters", () => {
        expect(validator.doesNotContainSpecialChars("password!@#")).toBe(false);
    });
    test("formIsValid should return true when all fields are correct", () => {
        const result = validator.formIsValid(
            "test@example.com", 
            "Password123", 
            "Password123"
        );
        expect(result).toBe(true);
    });

    test("formIsValid should return false if passwords do not match", () => {
        const result = validator.formIsValid(
            "test@example.com", 
            "Password123", 
            "WrongPassword"
        );
        expect(result).toBe(false);
    });
});