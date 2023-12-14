<script>
import {reactive, computed} from 'vue'
import {useVuelidate} from '@vuelidate/core'
import { required, maxLength, minLength, email, sameAs, helpers } from '@vuelidate/validators'
//import moment from "moment";
import axios from 'axios'

</script>

<template>
    <div class="login-page">
        <div class="login-container">
            <div class="background-image"></div>
            <h1 class="login-title">Войти в аккаунт</h1>
            <button class="google-login-btn"><img src="../assets/Google_logo.svg" alt="Лого Google" width="20px"
                                                  height="20px"> Log in with Google
            </button>
            <div class="divider-line">
                <span class="divider-text">ИЛИ</span>
            </div>
            <form @submit.prevent="submit" class="login-form">
                <label for="email" class="form-label" :class="{ invalid: emailError }">Почта или номер телефона</label>
                <input type="text" id="email" name="email" class="form-input" v-model="email" required>
                <span class="error" v-if="emailError">{{ emailError }}</span>
                <label for="password" class="form-label">Пароль</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" class="form-input" v-model="password" required
                           :type="passwordType">
                    <img class="toggle-password" src="../assets/eye.svg" @click="togglePassword">
                </div>
                <div class="forgot-password">
                    <router-link to="/recovery">Для тех кто забыл пароль</router-link>
                    <router-view></router-view>
                </div>
                <div>
                    <router-link to="/donelogin">
                        <button type="submit" class="login-btn"
                                :class="{ 'active': email && password && (!emailError)}">Войти
                        </button>
                    </router-link>
                    <router-view></router-view>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'login',
    data() {
        return {
            email: "",
            password: "",
            emailError: "",
            passwordType: "password",
        }
    },
    methods: {
        submit() {
            this.validateEmail();
            this.validatePassword();
            if (!this.emailError) {
                // send the data to the server
                console.log(this.email, this.password);
            }
        },
        validateEmail() {
            // check if the email is valid or the phone number is 10 digits
            const emailRegex=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            const phoneRegex=/^\d{11}$/;
            if (emailRegex.test(this.email) || phoneRegex.test(this.email)) {
                this.emailError="";
            } else {
                this.emailError="Неверный формат почты или номера телефона";
            }
        },
        togglePassword() {
            // switch the password type and icon
            if (this.passwordType === "password") {
                this.passwordType="text";
            } else {
                this.passwordType="password";
            }
        },
    },
}
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

.input-wrapper {
    position: relative;
}

.toggle-password {
    position: absolute;
    top: 35%;
    right: 15px;
    transform: translateY(-50%);
}

.login-page {
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins', sans-serif;
}

.background-image {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('../assets/main.png');
    background-size: cover;
    z-index: -1;
}

.login-container {
    background-color: #fff;
    color: #000;
    width: 795px;
    height: 700px;
    border-radius: 24px;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 40px;
    margin-top: 100px;
}

.login-title {
    text-align: center;
    font-size: 36px;
    margin-bottom: 40px;
}

.google-login-btn {
    width: 528px;
    height: 72px;
    font-size: 24px;
    margin-bottom: 40px;
    border-radius: 40px;
    border: 1px solid #000000;
    background-color: #fff;
    color: #000;
}

.divider-line {
    display: flex;
    align-items: center;
    font-size: 24px;
    width: 67%;
    margin-bottom: 24px;
}

.divider-line::before,
.divider-line::after {
    content: '';
    flex-grow: 1;
    height: 1px;
    background-color: #666666;
    opacity: 25%;
}

.divider-text {
    padding: 0 16px;
}

.login-form {
    display: flex;
    flex-direction: column;
}

.form-label {
    justify-content: start;
    font-size: 16px;
    margin-bottom: 8px;
    text-align: left;
    color: #666;
}

.form-input {
    width: 528px;
    height: 56px;
    border-radius: 12px;
    border: 1px solid #ccc;
    margin-bottom: 24px;
    font-size: 16px;
    padding-left: 10px;
    background-color: #fff;
    color: #000;
}


.forgot-password {
    text-align: right;
    text-decoration-line: underline;
    margin-bottom: 24px;
}

.forgot-password a {
    color: #111111;
}

.login-btn {
    width: 528px;
    height: 64px;
    border-radius: 40px;
    background-color: #ccc;
    border: 1px solid #ccc;
    color: #fff;
    font-size: 22px;
}

.login-btn.active {
    background-color: #000;
}

.error {
    color: red;
    font-size: 12px;
    margin-top: -20px;
    margin-bottom: 25px;
}

</style>
