<template>
    <div class="login-page">
        <div class="left"></div>
        <div class="login-container">
            <h1 class="login-title">Восстановление пароля</h1>
            <h2 class="login-h2">У тебя нет аккаунта? Создать можно <u>здесь</u></h2>
            <form @submit.prevent="submit" class="login-form">
                <label for="email" class="form-label" :class="{ invalid: emailError }">Введите почту или номер
                    телефона</label>
                <input type="text" id="email" name="email" class="form-input" v-model="email" required>
                <span class="error" v-if="emailError">{{ emailError }}</span>
                <label for="password" class="form-label">Введите новый пароль</label>
                <div class="input-wrapper">
                    <input id="password" name="password" class="form-input" v-model="password" required
                           :class="{ invalid: passwordError }" :type="passwordType">
                    <img class="toggle-password" src="../assets/eye.svg" @click="togglePassword">
                </div>
                <span class="error" v-if="passwordError">{{ passwordError }}</span>
                <label for="confirm" class="form-label">Повторите пароль</label>
                <div class="input-wrapper">
                    <input type="password" id="confirm" class="form-input" v-model="confirm"
                           :class="{ invalid: confirmError }" :type="passwordType" />
                    <img class="toggle-password" src="../assets/eye.svg" @click="togglePassword">
                </div>
                <span class="error" v-if="confirmError">{{ confirmError }}</span>
                <div>
                    <button type="submit" class="login-btn" @click="handleButtonClick">Восстановить</button>
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
            confirm: "",
            emailError: "",
            passwordError: "",
            confirmError: "",
            passwordType: "password",
        }
    },
    methods: {
        submit() {
            this.validateEmail();
            this.validatePassword();
            this.validateConfirm();
            if (!this.emailError && !this.passwordError && !this.confirmError) {
                // send the data to the server
                console.log(this.email, this.password, this.confirm);
            }
        },
        validateEmail() {
            // check if the email is valid or the phone number is 11 digits
            const emailRegex=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            const phoneRegex=/^\d{11}$/;
            if (emailRegex.test(this.email) || phoneRegex.test(this.email)) {
                this.emailError="";
            } else {
                this.emailError="Неверный формат почты или номера телефона";
            }
        },
        validatePassword() {
            // check if the password is at least 8 characters long
            if (this.password.length >= 8) {
                this.passwordError="";
            } else {
                this.passwordError="Пароль должен быть не менее 8 символов";
            }
        },
        validateConfirm() {
            // check if the confirm password matches the password
            if (this.confirm === this.password) {
                this.confirmError="";
            } else {
                this.confirmError="Пароли не совпадают";
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
        handleButtonClick() {
            if (this.email && this.password && this.confirm && (!this.emailError) && (!this.passwordError) && (!this.confirmError)) {
                this.$router.push('/donelogin');
                document.querySelector('.login-btn').classList.add('active');
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
    right: 15px;
    top: 35%;
    transform: translateY(-50%);
}

.login-page {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: -8px;
    margin-left: -9px;
    margin-bottom: -8px;
    font-family: 'Poppins', sans-serif;
}

.left {
    flex: 1;
    background-image: url('../assets/image3.png');
    width: 100%;
    height: 100%;
    background-size: cover;
}

.login-container {
    flex: 1;
    background-color: #fff;
    color: #000;
    width: 50%;
    height: 700px;
    border-radius: 24px;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 100px;
}

.login-title {
    text-align: center;
    font-size: 32px;
}

.login-h2 {
    text-align: center;
    font-size: 16px;
    color: #333333;
    margin-top: 0px;
    margin-bottom: 40px;
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
    color: #666;
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
