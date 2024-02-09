import { expect, test } from 'vitest';
import { mount } from '@vue/test-utils';
import LastUser from '../components/LastUser.vue';
 
describe('LastUser', () => {

  test('Renders last user', () => {
    const wrapper = mount(LastUser);
    wrapper.setProps({ lastUser: {
      "name": "Tree nation citizen",
      "profile_picture": "https://treenation-uploads.s3.eu-central-1.amazonaws.com/default_profile.jpg",
      "registered_at": "2023-01-01 15:03:20"
      } });
    expect(wrapper).toMatchSnapshot();
  });

  test('Renders last user without prop', () => {
    const wrapper = mount(LastUser);
    expect(wrapper).toMatchSnapshot();
  });
});
