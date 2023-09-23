import { Drawer } from 'expo-router/drawer';

export default function DrawerLayout() {
  return (
  <Drawer
  screenOptions={{
    headerShown: false
  }}
  >
    <Drawer.Screen 
      name='stories'
      options={{
        drawerLabel: "Stories",
        title: "Stories",
      }}
    />
    <Drawer.Screen 
      name='audio'
      options={{
        drawerLabel: "Audio",
        title: "Audio",
      }}
    />
    <Drawer.Screen 
      name='create_story'
      options={{
        drawerLabel: "Create Story",
        title: "Create Story",
      }}
    />
  </Drawer>);
}