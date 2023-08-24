import { useState } from 'react';
import { 
  View,
  Text,
  TouchableOpacity,
  Image,
  FlatList,
  ActivityIndicator,
} from 'react-native';
import { useRouter } from 'expo-router';

import { icons, SIZES, COLORS } from '../../../constants';
import styles from './stories.style';
import fetchStories from './fetchStories';

const Stories = () => {
  const router = useRouter();
  const { stories, isLoading, error } = fetchStories();
  const [activeStory, setActiveStory] = useState(null);

  return (
    <View style={styles.cardsContainer}>
        {isLoading ? (
          <ActivityIndicator size='large' color={COLORS.primary} />
        ) : error ? (
          <Text style={styles.cardSubtitle}>Something went wrong</Text>
        ) : (
      <FlatList
        data={stories}
        renderItem={({ item }) => (
          <TouchableOpacity
            style={styles.card(activeStory, item)}
            onPress={() => {
              setActiveStory(item);
              router.push(`/stories/${item.id}`);
            }}
          >
            <Text style={styles.cardTitle}>{item.name}</Text>
            <Text style={styles.cardSubtitle}>{item.reward}</Text>
            <Image
              source={icons.heartOutline}
              resizeMode="contain"
              style={styles.favBtnImage}
            />
          </TouchableOpacity>
        )}
        numColumns={2}
        keyExtractor={(item) => item.id}
        contentContainerStyle={{ columnGap: SIZES.xxLarge, rowGap: SIZES.xxLarge }}
        style={styles.list}
      />
      )}
    </View>  
  );
};

export default Stories;