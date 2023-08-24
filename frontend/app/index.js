import { useState } from 'react';
import { View, Text, ScrollView, SafeAreaView} from 'react-native';
import { Stack, useRouter} from 'expo-router';

import { COLORS, icons, images, SIZES } from '../constants';
import { ScreenHeaderBtn, Welcome, Stories } from '../components';

const Home = () => {
  return (
    <SafeAreaView style={{ flex: 1, backgroundColor: COLORS.lightWhite }}>
      <Stack.Screen 
      options={{
        headerStyle: { backgroundColor: COLORS.lightWhite },
        headerShadowVisible: false,
        headerLeft: () => (
          <ScreenHeaderBtn iconUrl={icons.menu} dimension="60%"/>
        ),
        headerRight: () => (
          <ScreenHeaderBtn iconUrl={images.profile} dimension="60%"/>
        ),
        headerTitle: "",
      }}/>

      <ScrollView showsVerticalScrollIndicator={false}>
        <View
        style={{
          flex: 1,
          padding: SIZES.medium
        }}>
          <Welcome/>
          <Stories/>
        </View>
      </ScrollView>

    </SafeAreaView>
  )
}

export default Home;