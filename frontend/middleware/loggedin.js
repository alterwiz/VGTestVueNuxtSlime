/* eslint func-names: ["error", "never"] */
export default function({ store, redirect, route }) {
  let uri = '';

  console.dir(store);

  if (!store.state.userStore.userInfo.isLoggedIn) {
    uri = `/login/?redirect=${route.path}`;
  } else if (route.path === '/') {
    uri = '/videos';
  }

  console.log(uri);

  return uri === '' ? null : redirect(uri);
}
