
import axios from 'axios';
import { UserStore } from '@/store/UserStore';
export default function logoutComponent(){


    const logout = () => {
        UserStore().removeToken('token');
       
        /* const router = useRouter();
      
        
       */
    //    router.go({ name: 'Index' }); 
    }

    return {
        logout,
       
        // router
       
    }
} 