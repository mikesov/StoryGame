import { Drawer } from 'expo-router/drawer';

export default function DrawerLayout() {
  return (
  <Drawer
  screenOptions={{
    headerShown: false
  }}
  >
    <Drawer.Screen 
      name='home'
      options={{
        drawerLabel: "Home",
        title: "Home",
      }}
    />
    <Drawer.Screen 
      name='stories'
      options={{
        drawerLabel: "Stories",
        title: "Stories",
      }}
    />
    <Drawer.Screen 
      name='games'
      options={{
        drawerLabel: "Games",
        title: "Games",
      }}
    />
  </Drawer>);
}