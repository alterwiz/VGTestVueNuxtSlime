/* eslint no-shadow: ["error", { "allow": ["state"] }] */
/* eslint no-param-reassign: "error" */

export const state = () => ({

  userInfo: {
    name: '',
    isLoggedIn: false,
  },

});

export const mutations = {

  add(state, name) {
    state.userInfo.isLoggedIn = true;
    state.userInfo.name = name;
  },

  remove(state) { state.userInfo = { name: '', isLoggedIn: false }; },

};
