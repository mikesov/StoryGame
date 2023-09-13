import { View, Text } from 'react-native';
import { Drawer } from 'expo-router/drawer';
import { DrawerToggleButton } from "@react-navigation/drawer";

export default function Games() {
  return (
    <View>
      <Drawer.Screen 
        options={{
          title: "Game",
          headerLeft: () => <DrawerToggleButton />,
        }}
      />
      <View></View>
      <Text>Games screen</Text>
    </View>
  );
}