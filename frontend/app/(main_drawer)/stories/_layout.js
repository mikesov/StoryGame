import { Stack } from "expo-router";
import { ScreenHeaderBtn } from "../../../components";
import { icons } from "../../../constants";

export default function StoriesLayout() {
  return (
    <Stack initialRouteName="index">
      <Stack.Screen
        name="index"
      />
      <Stack.Screen
        name="[id]"
        options={{
          headerTransparent: true
        }}
      />
    </Stack>
  );
}