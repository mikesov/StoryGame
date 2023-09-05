import { Drawer } from "expo-router";

export default function DrawerLayout() {
  return (
    <Drawer
      screenOptions={{ headerShown: false}}
    >
      <Drawer.Screen
        name="home"
        options={{
          drawerLabel: "Home",
          title: "Home",
        }}
      />
    </Drawer>
  );
}