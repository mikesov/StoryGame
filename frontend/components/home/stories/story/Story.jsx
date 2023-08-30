import { useCallback, useState } from 'react';
import { View, Text, SafeAreaView, ActivityIndicator, RefreshControl } from 'react-native';
import { Stack, useRouter, useGlobalSearchParams } from "expo-router";
import { SwiperFlatList } from 'react-native-swiper-flatlist';

import { COLORS, icons, SIZES } from '../../../../constants';
import { fetchStory } from '../../../../hooks';
import styles from '../stories.style';

const StoryView = () => {
  const params = useGlobalSearchParams();

  const { story, isLoading, error } = fetchStory("stories", params.id);
  // console.log(story?.pages?.sentences);
  if (!story?.pages || story?.pages?.length <= 0) {
    return (
      <View>
        <Text>No pages!</Text>
      </View>
    );
  }
  // console.log(story.pages[0].id);
  return (
    <View>
      {isLoading ? (
        <ActivityIndicator size='large' color={COLORS.primary} />
      ) : error ? (
        <Text style={styles.cardSubtitle}>Something went wrong!</Text>
      ) : (
        <Text style={{paddingLeft:100, paddingTop:100}}>{story.pages[0].id}</Text>
      )}
      {/* <SwiperFlatList
        autoplay
        
        autoplayDelay={2}
        autoplayLoop
        index={2}
        showPagination
        data={story.pages}
        renderItem={({ item }) => (
        <View style={{marginTop:20}}>
          <Text style={{fontSize:20}}>{item.page_id}</Text>
        </View>
        )}
      /> */}
    </View>
  )
}

export default StoryView;