import { useCallback } from 'react';
import { View, LogBox } from 'react-native';
import { Drawer } from 'expo-router/drawer';
import { useFonts } from 'expo-font';
import * as SplashScreen from 'expo-splash-screen';
import { DrawerToggleButton } from "@react-navigation/drawer";
import * as ScreenOrientation from 'expo-screen-orientation';

import { SearchBar, StoriesList } from '../../../../components';
import { SIZES } from '../../../../constants';

SplashScreen.preventAutoHideAsync();

LogBox.ignoreLogs(['new NativeEventEmitter']);

export default function Stories() {
  ScreenOrientation.lockAsync(ScreenOrientation.OrientationLock.PORTRAIT_UP);

  const [fontsLoaded, fontError] = useFonts({
    PTSansRegular: require("../../../../assets/fonts/PTSans-Regular.ttf"),
    PTSansBold: require("../../../../assets/fonts/PTSans-Bold.ttf"),
    PTSansItalic: require("../../../../assets/fonts/PTSans-Italic.ttf"),
  });

  const onLayoutRootView = useCallback(async () => {
    if (fontsLoaded || fontError) {
      await SplashScreen.hideAsync();
    }
  }, [fontsLoaded, fontError]);

  if (!fontsLoaded && !fontError) {
    return null;
  }

  return (
    <View style={{
      flex:1,
      marginLeft: SIZES.medium,
      marginRight: SIZES.medium,
    }}
    onLayout={onLayoutRootView}>
      <Drawer.Screen 
        options={{
          title: "Stories",
          headerShadowVisible: false,
          headerLeft: () => <DrawerToggleButton />,
        }}
      />
      <SearchBar />
      <StoriesList />
    </View>
  );
}