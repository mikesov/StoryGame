import { View, Text, FlatList } from 'react-native';
import { Drawer } from 'expo-router/drawer';
import { DrawerToggleButton } from "@react-navigation/drawer";
import { useFonts } from 'expo-font';
import { useCallback } from 'react';
import * as SplashScreen from 'expo-splash-screen';

import { icons, SIZES, COLORS } from '../../../../constants';

export default function Audio() {

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
          title: "Create Story",
          headerLeft: () => <DrawerToggleButton />,
        }}
      />
    </View>
  );
}