import { defineStore } from "pinia";

export const useUserStore = defineStore("user", {
    state: () => ({
        id: null,
        name: null,
        email: null,
    }),

    persist: true,
});