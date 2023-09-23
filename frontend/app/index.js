import { Redirect } from 'expo-router';
import { AuthProvider, useAuth } from '../context/AuthContext';
import { Stack } from 'expo-router';

import { ScreenHeaderBtn } from '../components';
import { icons } from '../constants';

export default function Root() {
  const { authState, onLogout } = useAuth();

  return (
    <Redirect href={"/main_app"}/>
    // <AuthProvider>
    //   { authState?.authenticated ? (
    //     <Redirect href={"/main_app"}/>
    //   ) : (
    //     <Redirect href={"/login"}/>
    //   )}
    // </AuthProvider>
  );
}