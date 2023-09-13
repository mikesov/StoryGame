import { StoryView } from '../../../components';
import { Stack } from "expo-router";
import { View } from 'react-native'
import * as ScreenOrientation from 'expo-screen-orientation';

export default function StoryScreen() {
  ScreenOrientation.lockAsync(ScreenOrientation.OrientationLock.LANDSCAPE_RIGHT);

  return (
    <StoryView />
  );
}