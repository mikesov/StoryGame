import { Text, View, StyleSheet, ScrollView } from "react-native";
import { Drawer } from "expo-router/drawer";
import { DrawerToggleButton } from "@react-navigation/drawer";
import { Constants } from "expo-constants";

import { Welcome } from "../../../components";

export default function Home() {
  return (
      <View style={styles.container}>
        <Drawer.Screen 
          options={{
            headerShown: true,
            headerLeft: () => <DrawerToggleButton />,
            title: "Home",
            headerStyle: {padding: 0, margin: 0, backgroundColor: "red"},
          }}
        />
        {/* <Welcome/> */}

      </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#fff",
  },
});