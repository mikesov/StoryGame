import { Stack } from "expo-router";

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