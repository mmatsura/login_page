import { test, expect } from '@playwright/test';

test("Should display login form correctly", async ({ page }) => {
    await page.goto("http://localhost/login_page_gitHub/login.php");

    // 1. Шукаємо поле email ТІЛЬКИ всередині блоку #active (це твоя активна форма)
    const emailInput = page.locator('#active input[name="email"]');
    const passwordInput = page.locator('#active input[name="password"]');
    const loginButton = page.locator('#active button[type="submit"]');

    await expect(emailInput).toBeVisible();
    await expect(passwordInput).toBeVisible();
    await expect(loginButton).toBeVisible();

    await expect(emailInput).toHaveValue("");
});
test("User can navigate to registration form", async ({ page }) => {
    await page.goto("http://localhost/login_page_gitHub/login.php");

    await page.getByText('Register').first().click({ force: true });

    await page.waitForTimeout(2000);

    const regHeading = page.locator('h2:has-text("Register"), h2:has-text("Registration")').first();
    await expect(regHeading).toBeVisible();

    const confirmInput = page.locator('input[type="password"]').last();
    
    await expect(confirmInput).toBeVisible();
});