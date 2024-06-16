<template>
    <div class="form auth-boxed">
        <div class="form-container outer">
            <div class="form-form">
                <div class="form-form-wrap">
                    <div class="form-container">
                        <div class="form-content">
                            <h1 class="">Sign In</h1>
                            <p class="">Log in to your account to continue.</p>

                            <form class="text-start">
                                <div class="form">

                                    <div class="d-sm-flex justify-content-between">
                                        <div class="field-wrapper">
                                            <button type="submit" class="btn btn-primary">Log In</button>
                                        </div>
                                    </div>

                                    <div class="division">
                                        <span>OR</span>
                                    </div>

                                    <div class="social">
                                        <a href="javascript:void(0);" class="btn social-fb">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-facebook"
                                            >
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                            </svg>
                                            <span class="brand-name">Facebook</span>
                                        </a>
                                        <a href="javascript:void(0);" class="btn social-github">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-github"
                                            >
                                                <path
                                                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"
                                                ></path>
                                            </svg>
                                            <span class="brand-name">Github</span>
                                        </a>
                                    </div>

                                    <p class="signup-link">Not registered ? <router-link to="/auth/register-boxed">Create an account</router-link></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref } from "vue";
    import "../../assets/sass/authentication/auth-boxed.scss";

    import { useMeta } from "../../composables/use-meta";
    useMeta({ title: "Login Boxed" });

    const pwd_type = ref("password");

    const set_pwd_type = () => {
        if (pwd_type.value === "password") {
            pwd_type.value = "text";
        } else {
            pwd_type.value = "password";
        }
    };
</script>
