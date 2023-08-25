import { useCallback, useState } from 'react';
import { View, Text, SafeAreaView, ScrollView, ActivityIndicator, RefreshControl } from 'react-native';
import { Stack, useRouter, useGlobalSearchParams } from "expo-router";
import {useRoute} from "@react-navigation/native";

import { COLORS, icons, SIZES } from '../../constants';
import {fetchStory} from '../../hooks';

const Story = () => {
  const params = useGlobalSearchParams();
  const router = useRouter();
  const route = useRoute();

  const { stories, isLoading, error, refetch } = fetchStory("stories", parseInt(params.id));
  return (
    <View>
      <Text>{stories.name}</Text>
    </View>
  )
}

export default Story;