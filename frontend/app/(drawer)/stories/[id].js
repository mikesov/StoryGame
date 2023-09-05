import { useCallback, useEffect, useState } from 'react';
import { View, Text, SafeAreaView, ScrollView, ActivityIndicator, RefreshControl } from 'react-native';
import { Stack, useRouter, useGlobalSearchParams } from 'expo-router';
import * as ScreenOrientation from 'expo-screen-orientation';

import { COLORS, icons, SIZES } from '../../../constants';
import { fetchStory } from '../../../hooks';
import { StoryView, ScreenHeaderBtn } from '../../../components';

const Story = () => {
  ScreenOrientation.lockAsync(ScreenOrientation.OrientationLock.LANDSCAPE_RIGHT);
  const router = useRouter();

  return (
    <SafeAreaView>
      <Stack.Screen 
        options={{
          headerTransparent: true,
          headerBackVisible: false,
          headerLeft: () => (
            <ScreenHeaderBtn
              iconUrl={icons.left}
              dimension="60%"
              handlePress={() => {
                ScreenOrientation.lockAsync(ScreenOrientation.OrientationLock.PORTRAIT_UP);
                router.back();
              }}
            />
          ),
          headerTitle: "",
        }}/>
      <StoryView/>
    </SafeAreaView>
  );
}

export default Story;