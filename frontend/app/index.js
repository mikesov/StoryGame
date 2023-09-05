import * as ScreenOrientation from 'expo-screen-orientation';
import { LogBox } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createDrawerNavigator } from '@react-navigation/drawer';
import { Redirect, Stack } from 'expo-router';

import { COLORS, icons, images, SIZES } from '../constants';
// import { ScreenHeaderBtn, Home } from '../components';

// LogBox.ignoreLogs(['new NativeEventEmitter']);

// const Drawer = createDrawerNavigator();

const Index = () => {
  // ScreenOrientation.lockAsync(ScreenOrientation.OrientationLock.PORTRAIT_UP);
  return <Redirect href={"/(drawer)/home"}/>
  // return (
    
    // <NavigationContainer
    // independent={true}>
    //   <Drawer.Navigator>
    //     <Drawer.Screen
    //       name='HomeScreen'
    //       component={Home}
    //       options={{
    //         headerStyle: { backgroundColor: COLORS.lightWhite },
    //         headerShadowVisible: false,
    //         headerLeft: () => (
    //           <ScreenHeaderBtn iconUrl={icons.menu} dimension="60%"/>
    //         ),
    //         headerRight: () => (
    //           <ScreenHeaderBtn iconUrl={images.profile} dimension="60%"/>
    //         ),
    //         headerTitle: "",
    //       }}
    //     />
    //   </Drawer.Navigator>
    // </NavigationContainer>
  // )
}

export default Index;