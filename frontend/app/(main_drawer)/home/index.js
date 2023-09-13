import { Drawer } from 'expo-router/drawer';
import { View, Text } from 'react-native';
import { DrawerToggleButton } from "@react-navigation/drawer";
import * as ScreenOrientation from 'expo-screen-orientation';

export default function Home() {
  ScreenOrientation.lockAsync(ScreenOrientation.OrientationLock.PORTRAIT_UP);
  
  return (
    <View>
      <Drawer.Screen 
        options={{
          title: "Home",
          headerLeft: () => <DrawerToggleButton />,
        }}
      />
      <View>
        <Text>Home Screen</Text>
      </View>
    </View>
  );
}